<?php

namespace App\Command;


use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpClient\HttpClient;
use App\Entity\Character;
use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;


#[AsCommand(
    name: 'starwars:import',
    description: 'Add a short description for your command',
)]
class StarwarsImportCommand extends Command
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $client = HttpClient::create();

        // since SWAPI gives it's data in chunks of 10, we need to get 3 sets of data
        $petitionUrls = 
        [
            'https://swapi.dev/api/people/',
            'https://swapi.dev/api/people/?page=2',
            'https://swapi.dev/api/people/?page=3'
        ];

        foreach ($petitionUrls as $url)
        {
            $peopleResponse = $client->request(
                'GET',
                $url
            );

            if ($peopleResponse->getStatusCode() === 200) 
            {
                $content = $peopleResponse->getContent();
                $content = $peopleResponse->toArray();
                foreach ($content['results'] as $person) {
                    $character = new Character();

                    $character->setName($person['name']);
                    $character->setMass((int)$person['mass']);
                    $character->setHeight((int)$person['height']);
                    $character->setGender($person['gender']);

                    $this->entityManager->persist($character);
                }

            } else {
                $io->note(sprintf('ERROR: data not correctly recieved'));
                return Command::FAILURE;
            }
        }

        //movies
        $moviesResponse = $client->request(
            'GET',
            'https://swapi.dev/api/films/'
        );

        if ($moviesResponse->getStatusCode() === 200) 
            {
                $content = $moviesResponse->getContent();
                $content = $moviesResponse->toArray();
                foreach ($content['results'] as $film) {
                    $movie = new Movie();

                    $movie->setName($film['title']);

                    $this->entityManager->persist($movie);
                }

            } else {
                $io->note(sprintf('ERROR: data not correctly recieved'));
                return Command::FAILURE;
            }
        
        $this->entityManager->flush();

        $io->note(sprintf('SUCCESS: data migrated correctly!'));
        return Command::SUCCESS;
    }
}

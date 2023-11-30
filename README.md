# gmw-tech-test
Gracia Media Web tech test consists of creating a Star Wars database by fetching information from the SWAPI API, and implement functionalities to view, edit, and delete characters. Additionally, display a list of movies and characters associated with each movie.

Project Setup
Back:
Inside the folder ./Backend/.docker, run:

Copy code
docker compose up -d
From inside the Docker machine, generate DB and tables from entities:

bash
Copy code
php bin/console make:migration
bin/console doctrine:migrations:migrate
Populate the DB with a custom command:

javascript
Copy code
php bin/console starwars:import
Access the backend at:

http://localhost:8080/
http://localhost:8080/characters to see the list of all characters
http://localhost:8080/characters/{id} to view an individual character
Front:
On the root of the folder /Frontend, run:

Copy code
docker compose up -d
Access the frontend at:

http://localhost:3000/
Project Overview
What I Have Done:
Prepared the environment for coding, utilizing template repositories for each part:

Front: React-Nginx - Removed nginx production part and adjusted for port 3000.
Back: Symfony-Docker - Ensured no port collisions between front and back.
Backend:

Generated entities and controllers via Symfony PHP commands.
Adapted controllers to return JSON instead of twig templates.
Created a custom command (php bin/console starwars:import) for data migration.
Frontend:

Adapted React App.js for exercise requirements.
Generated cards and added basic styles for layout.
Difficulties Faced:
Entity named Character resulted in a table named character due to it being a reserved word. Solution: ORM mapping for each Entity.

Serialization in the controller caused issues with returning empty objects to the front. Solution: Used $serializer->normalize to convert the object into an array before sending as JSON.

Future Plans (with more time):
Finish all functionalities as per task requirements.
Refactor the command to make parallel requests instead of sequential.
Implement atomic design in React components, possibly using Storybook.
Refactor backend CRUD, especially the extra code from class creation with PHP command.
Add tests, considering a Test-Driven Development (TDD) approach.
Refine package.json to use styled components for better organization in atomic design.
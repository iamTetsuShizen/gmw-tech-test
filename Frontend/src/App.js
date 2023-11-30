import React, { useState, useEffect } from 'react';
import './App.css';

function App() {
  const [characters, setCharacters] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');

  useEffect(() => {
    fetchCharacterData();
  }, []);

  async function fetchCharacterData() {
    const url = 'http://localhost:8080/characters';
    try {
      let result = await fetch(url);
      result = await result.json();
      setCharacters(result);
    } catch (error) {
      console.error('Error fetching character data:', error);
    }
  }

  const handleInputChange = (event) => {
    setSearchTerm(event.target.value);
  };

  const handleSearch = (event) => {
    //TODO: manage search on front
    event.preventDefault();
  };

  return (
    <div className="App">
      <header>
        <form className="searchBar" onSubmit={handleSearch}>
          <input type="text" value={searchTerm} onChange={handleInputChange} />
          <button type="submit">Search</button>
        </form>
      </header>
      <section>
        {characters.map((character) => (
          <div key={character.id} className="card">
            <img src={character.picture} alt={character.name} />
            <h3>{character.name}</h3>
            <p>Gender: {character.gender}</p>
            <p>Height: {character.height} cm</p>
            <p>Mass: {character.mass} kg</p>
          </div>
        ))}
      </section>
    </div>
  );
}

export default App;
import logo from './logo.svg';
import './App.css';

function App() {
  function test() {
    const url = "http://localhost:8080/articles"

    let articles = fetch(url).then(data=>{return data.json()})

    console.log(articles)
  }

  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn
        </a>
        <h1> TEST ONE quizas prueba loca</h1>
        <button onClick={test}>Test</button>
      </header>
    </div>
  );
}

export default App;

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
      <header>
        <form className="searchBar">
          <input></input>
          <button> Search </button>
        </form>
      </header>
      <section>

      </section>
    </div>
  );
}

export default App;

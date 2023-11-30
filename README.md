**Star Wars Database Project Documentation**

**Objective:**
Create a Star Wars database by fetching information from the SWAPI API, and implement functionalities to view, edit, and delete characters. Additionally, display a list of movies and characters associated with each movie.

**Database Structure:**

1. **characters Table:**
   - id (Primary Key)
   - name
   - mass
   - height
   - gender
   - picture

2. **movies Table:**
   - id (Primary Key)
   - name

3. **movies_characters Table:**
   - movie_id (Foreign Key referencing movies.id)
   - character_id (Foreign Key referencing characters.id)

**Command to Import Data:**
```bash
php bin/console starwars:import
```

**Homepage:**
Display a list of all characters in the database with their names and pictures. Include a search functionality to find characters by their names.

**Character Details Page:**
- Clicking on a character's name redirects to a detailed page.
- The page should show all details of the character.
- Include an option to edit the character's data and upload a new picture.
- Provide a button to delete the character.

**Editing Form:**
- Editable fields: name, mass, height, gender.
- Ability to upload a new picture.
- Option to delete the character.

**Movies Page:**
- Create a new page with the URL "/movies" to list all movies in the database.
- Clicking on a movie name should display a list of characters associated with that movie along with their uploaded pictures.

**Implementation Notes:**

1. **Fetching Data from SWAPI:**
   - Use the SWAPI API (https://swapi.dev/) to download information about 30 characters and all movies.
   - Map the data to the respective tables in the database.

2. **Command Implementation:**
   - Create a Symfony console command named `starwars:import` to fetch and import data.

3. **Homepage Implementation:**
   - Display characters with names and pictures.
   - Implement a search feature to find characters by name.

4. **Character Details and Editing:**
   - Create a detailed page for each character.
   - Include an edit form with the ability to upload a new picture.
   - Implement deletion functionality.

5. **Movies Page Implementation:**
   - Create a new page with the URL "/movies" to list all movies.
   - Display characters associated with each movie, including uploaded pictures.

**Extra Points (Optional):**
- Implement pagination for character and movie lists.
- Add styling and enhance the user interface.
- Implement user authentication for editing and deleting characters.
- Implement error handling for API requests and database operations.

**Note:**
Ensure that Symfony and any required dependencies are properly configured before running the command. Follow Symfony and Doctrine documentation for database and command setup.
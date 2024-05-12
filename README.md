# how to download the Laravel project from Git

Federico Dutto - Pashollari Thomas 5°A INF 

* ***Clone the Project from Git:*** 
   
    * Open your terminal or command prompt.
    * Navigate to the directory where you want to store the project.
    * Run the following command to clone the project from Git:

   ```console
    git clone <repository_url>
    ```
Replace <repository_url> with the URL of the Git repository where the Laravel project is hosted.

* ***Install Dependencies***

  * Navigate into the project directory:
       ```console
       cd <project_name>
       ```
  Replace <project_name> with the name of the directory where the project was cloned.

  * Once inside the project directory, install the dependencies using Composer:
      ```console
      composer install
      ```
  This command will install all the required PHP dependencies for the Laravel project.

  * ***Set Up Environment Configuration:***

    * Generate an application key:
      ```console
      php artisan key:generate
      ```
 This command will generate a unique application key used for encryption and other security purposes.

 * ***Run Migrations***
   * Run the migrations to create the required database tables:
     ```console
      php artisan migrate
      ```
* ***Start the Development Server:***

  * Once everything is set up, you can start the Laravel development server:
      ```console
       php artisan serve
      ```
This will start a development server on http://localhost:8000 by default.

* ***Test the Project:***
  * Open your web browser and navigate to http://localhost:8000
    (or the appropriate URL if you've changed the port).
  * You should see the Laravel application running.
    Test its various features and functionalities to ensure everything is working as expected.

Thank you for choosing our project!
   

   
     




      



![Logo](https://i.ibb.co/smP8gBr/Screenshot-2023-11-06-at-14-52-11.png)


# EuroClub Vault (Backend)

The EuroClub Vault backend service, developed using the Laravel framework, serves as the backbone of the application, handling critical functions such as data storage, and API interactions with the front end. It offers a robust and secure foundation, allowing users to create, update, and retrieve player profiles, manage player positions, and filter players based on various attributes. In addition to its core features, the backend integrates third-party services, including Wikipedia, to enrich player profiles with comprehensive information, including biographies, career highlights, and images. This integration enhances the user experience by providing a more in-depth understanding of each player's background. Overall, the Euroclub Vault backend embodies the versatility and connectivity of modern web applications, delivering a comprehensive platform for football enthusiasts and analysts alike.
 
## Modules

**1) Player Controller:** This controller primarily handles player-related operations. It facilitates the creation, updating, and retrieval of player profiles. Users can input information such as a player's full name, club, position, nationality, age, and market value through the front-end interface. The player controller validates and processes this data and communicates with the database to store and retrieve player information. It is the core component for managing the heart of the application, which is the database of football players.

**2) Helper Controller:** This serves as a utility controller responsible for managing player positions and filtering players.

**3) Wiki Controller:** The WikiController integrates with Wikipedia, to enrich player profiles with additional information. This controller communicates with Wikipedia's API to retrieve biographical and career-related data, along with images, for individual players. By leveraging Wikipedia's vast resources, the Euroclub Vault application provides users with detailed insights into a player's background and career highlights.


## API Documentation

Click here [here](https://documenter.getpostman.com/view/2563187/2s9YXfc3oj) to view the documentation for all the APIs.


## Pre-requisites

- Make sure PHP, Laravel, Composer and MySQL are installed and their PATHs defined. You can download Laravel from [here](https://laravel.com/docs/7.x/installation), Composer from [here](https://getcomposer.org/download/) and MySQL from [here](https://dev.mysql.com/downloads/installer/).


## Contributing

Contributions are always welcome! Any contributions you make are greatly appreciated.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".

To fork this Project
- Create your Feature Branch (git checkout -b feature/NewFeature)
- Commit your Changes (git commit -m 'Added some new feature')
- Push to the Branch (git push origin feature/NewFeature)
- Open a Pull Request

## Technologies Used
- PHP (v 8.1.17)
- Laravel (v 10.30.1)
- MySQL

## Run Locally

Clone the project

```bash
  git clone https://github.com/toubhie/performativ-backend.git
```

Go to the project directory

```bash
  cd performativ-backend
```

Install dependencies

```bash
  composer install
```

Start the server

```bash
  php artisan serve
```


## Running Tests

To run tests, run the following command

```bash
  php artisan test
```


## Screenshots

![App Screenshot](https://i.ibb.co/TvRDF3X/Screenshot-2023-11-06-at-15-20-38.png)

![App Screenshot](https://i.ibb.co/WDzcsRK/Screenshot-2023-11-06-at-15-20-46.png)


## Authors

- [Tobiloba Williams](https://github.com/toubhie)


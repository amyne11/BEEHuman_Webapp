# BEEHuman Web Application

Welcome to the BEEHuman Web Application! This project is designed to test your reaction time, typing speed, and hand-eye coordination through various interactive games. Below you will find an overview of the project, its structure, and how to set it up.

## Table of Contents

- [How It Works](#how-it-works)
- [Project Structure](#project-structure)
- [Database Structure](#database-structure)
- [Technologies Used](#technologies-used)
- [Project Organization](#project-organization)
- [Ethical Considerations](#ethical-considerations)
- [Lessons Learned](#lessons-learned)
- [Setup Instructions](#setup-instructions)


## How It Works

The application runs a series of games that test different skills:
- **Reaction Time**
- **Typing Speed**
- **Hand-Eye Coordination**

### System Structure

- **Front-End:** Developed using HTML, CSS, and JavaScript, with animations and media enhancements.
- **Back-End:** Built with PHP, using MySQL for database management, and PHPMYADMIN for database administration.

## Project Structure

The project is organized into three main phases:
1. **Front-End Development:** Initial layout and design of the website.
2. **Game Development:** Creating and integrating games using JavaScript and the Canvas API.
3. **Back-End Integration:** Connecting the front-end with the back-end and ensuring seamless data flow.

## Database Structure

- We use a relational database structure with unique usernames serving as foreign keys.
- High scores are managed by decomposing the leaderboards to simplify the logic.

## Technologies Used

- **Front-End:** HTML, CSS, JavaScript, FontAwesome
- **Back-End:** PHP, MySQL, PHPMYADMIN
- **Game Development:** JavaScript, Canvas API
- **Project Management:** GitLab, individual branches for feature development, Tkinter for interface

## Project Organization

- **Communication:** Daily communication within the team, weekly meetings to track progress, and regular discussions with a tutor for critical decisions.
- **Development Process:** Starting with front-end development, followed by game creation, and finishing with back-end integration.

## Ethical Considerations

- **User Data:** We ensure the security of user passwords by hashing them.
- **Data Privacy:** No personal data is stored, and user abilities data is handled with care.

## Lessons Learned

- Avoid bottlenecks by having multiple repository admins.
- Gain more experience with branches to prevent merge conflicts.
- Implement a Google account sign-in/up system.
- Use more frameworks and libraries to streamline development.

## Setup Instructions

### Prerequisites

- PHP installed on your machine
- MySQL server
- A web server like Apache or Nginx

### Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/amyne11/BEEHuman_Webapp.git
   cd BEEHuman_Webapp
   ```

### Set Up the Database

1. Import the provided SQL file into your MySQL database.
2. Update the database configuration in the `config.php` file.

### Run the Application

1. Start your web server.
2. Navigate to the project directory and open it in your browser.



# Sports Application

## Overview
This project is a web application/portal designed to connect people who enjoy participating in sports activities. The project is built using PHP with the Laravel Breeze and Tailwind CSS frameworks. Project uses tools like Composer, MySQL, Artisan and Vendor. The portal offers features for both unregistered and registered users, facilitating the organization and participation in various sports events.

## Run project
- Clone the repository.
```
git copy https://github.com/PPowroznik02/Sports-Application.git
```

- Move to cloned repository.
```bash
cd Sports-Application
```

- Run php environment source file.
```bash
source php.env
```

- From list of environment tools run notebooks.
```bash
run notes
```

- Now you should be redirected to localhost with an opened index notebook if not, navigate to the index notebook in Chrome browser.
```
http://localhost:9999/notebooks/index.ipynb
```

- Click the Application link in the index jupyter notebook.

- Once have been moved to Sports Application notebook, run all cells down to cell that opens phpstorm IDE.
```notebook
! phpstorm .
```

## Features 
Unregistered User

- Account Creation: Ability to create a new account.
- Login Panel: Access to the login panel for authentication.
- Events list: Access to a panel with a list of all events.

Registered User

- Event Creation: Create events such as group runs, training sessions, matches, etc. Users can set the date, time, category, maximum number of participants, location, and other details.
- Join Events: Declare interest in joining an event.
- Interest Declaration: Show interest in specific events.
- Event Search: Search for events by name or category.
- Event Filtering: Filter events by the number of interested users, number of participants, and date.

Event Admin

- Edit Events: Modify event details.
- Manage Participants: Remove users participating in the event.

Tech Stack

- PHP Laravel Breeze: For building the application backend.
- Markdown: For writing and formatting text.
- Tailwind CSS: For styling the frontend.
- Composer: For dependency management.
- MySQL: For the database.
- Artisan: Laravel’s command-line interface.

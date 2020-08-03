<img src="https://d2d3qesrx8xj6s.cloudfront.net/img/screenshots/d9220d65b5c4aa36459a23c6a2c62fa46783e6c2.jpeg" height="150" align="right">

# Drop-Down Menu
The goal for this project was to design a form with a drop-down list that can be updated from the front-end. In this case we have a selection of pre-built forms, any of which can be selected by the user to work on.

With my implementation, an end-user can update the drop-down values should they need to change without having developer access. This would allow less down time as that part of the form could be modified without going through multiple departments in a workplace.

## Technologies Used
* PHP - used for performing database interaction.
* JavaScript - a bit of JavaScript was used, mainly to implement the feature of hiding/showing the selected form in the drop-down menu. Specifically a jQuery plugin called ```TableEdit```.
* MariaDB/PHPmyAdmin - database management system that was used.
* HTML/CSS - for frontend structure and design work.

### How It Works
A table in the database is created specifically for the drop-down menu values. This allows for Create, Read, Update and Delete functionalities. Each form is hidden by default using a css property, then using the JavaScript function when the form is selected, it changes the css property to now show it.

The ```TableEdit``` plugin is a conveinent way of updating or deleting existing values by adding an option beside each value in the table. An example of updating a live record is shown below:


![Alt text](https://media.giphy.com/media/j51t4LprvDGBW4ACIX/giphy.gif)

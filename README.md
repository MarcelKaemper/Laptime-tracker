# Laptime-tracker

## Goal of this project
I often play racing games and I wanted to start tracking my laptimes accross different games and tracks.  
I used to store the data in spreadsheets,  but I got sick of it and created this application to make life easier.  

This Application makes use of PHP, Bootstrap, JQuery and the DataTable Plugin plus the Searchpanes extension.

## How to install
- Download the `laptime.sql` file and import it to your `MySQL/MariaDB` Database   
- Change the DB information in the `DBConnector.php` script  
- Put the PHP Scripts on a server of your choice  

## Features
- Adding different games, cars, tracks and even transmission types  
- Allows you to track your laptimes including the specified `parameters` (`parameters` -> games, cars, tracks, transmission type)
- Easily sorting and ordering the different datasets thanks to DataTables and Searchpanes  
- Creation date of the dataset, allowing you to easily track your personal lap improvement over time

## Future of this project
- [ ] Validate user input data
- [ ] Regex for input laptime
- [ ] Function to order table by laptime (fix bug for laptime below 1 minute)
- [ ] Automated data analysis+visualization


## Userinterface
![Adding data](https://i.imgur.com/3zJBs4B.png)
![Reading data](https://i.imgur.com/DVwFutl.png)

# Final Project
This project is a combination of coursework performed in both the WBD5100 and the WBD5204 modules. The project consists of two parts:
- The frontend (user section) made using:
-- VUE framework
-- axios, vuetify and vuex
-- a cookie

- The backend (for the admin section and backend scripting for the frontend) made using:
-- PHP 
-- SQL
-- composer
---
### 1. Backend and admin view setup (WBD5100)
1. run ***git clone git@github.com:FilipStanic/Instant-Pizza.git***
2. run ***cd final-project***
2. Import the ***instantpizza.sql*** file found in the root of this project.
2. Open the PHP-backend folder in a terminal and run:
-- ***php -S localhost:8087***
5. You may now view this project in **localhost:8087**
##### Admin login details:
- Email: **admin@admin.com**
- Password: **admin**
---

### 2. Setup for the frontend/ user view (WBD5204)
1. Follow all the steps for the **Backend and admin view setup (WBD5100)** if they have not been performed yet.
2. Add the chrome extension **Allow CORS: Access-Control-Allow-Origin**, which can be found here:
- https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf?hl=en#:~:text=Allow%20CORS%3A%20Access%2DControl%2DAllow%2DOrigin%20lets%20you,default%20(in%20JavaScript%20APIs).
3. Make sure that the previously installed extension is **switched on.**
4. Open the **vue-frontend** folder in another terminal window and run:
- ***npm install***
- ***npm run serve***
5. You may now view this project in your localhost url - provided by your terminal. 
---
# API structure
- **localhost:8087/api/items** 
-- a **get** request to this url will return all the items we have in our database table "items"
- **localhost:8087/api/orders** 
-- A **post** request to this url will submit data to the database tables "orders" and "item_order".
- **localhost:8087/api/faq** 
-- A **get** request to this url returns all the FAQ from our database table "faq".
---
# Extra notes
## 1. Frontend project
- reads for a cookie every time a view is loaded, and creates a cookie when the "accept cookies" prompt is confirmed - stopping the prompt from appearing when loading a new view.
- has a custom 404 page
## 2. Backend project
- has mandatory image uploads when creating a new item. However, it has optional image changing when editing an item. Uploading a new item image will delete the old item's image.
- has a custom 404 page







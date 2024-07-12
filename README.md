## MLP To-DO - Instructions

You must demonstrate the following abilities/skills: make models, controllers, migrations, HTML, CSS, blade, Git commits, blade templates, etc. 

**1. Fork this repo**

**2. Build front-end**

   Layout must be as follows:
   
   ![Alt text](assets/site-layout.png?raw=true "Title")
   Please note that the above image and logo are in the 'assets' folder.

**3. Build To-Do list functionality** 

     A user should be able to
     * Create a task.
     * Delete a task.
     * Mark a task as completed.
     

**Good Luck !!! Once done, please send us the link of your repo.**

**Setup instructions**
   
run `composer update`

run `npm install && npm run build`

**The following steps require a working docker install!**

run `php artisan breeze:install` (I used the mysql build)

run `./vendor/bin/sail up`

run `./vendor/bin/sail artisan migrate:fresh --seed` (adds some entries to the database for tasks, some complete some not)

Navigate to http://localhost

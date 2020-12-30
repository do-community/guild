<p align="center">
    <a href="https://guild.so" target="_blank">
        <svg width="400" viewBox="0 0 4705 1479" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g><path d="M642.013 1309.693l-41.978-19.522c-141.32-65.735-467.021-255.734-439.302-599.21 14.258-151.09 23.272-252.296 29.06-319.72l5.71-66.765 446.53-137.92 446.527 137.92 5.712 66.783c4.245 49.511 10.249 117.232 18.745 209.006H913.264c-4.468-48.398-8.22-89.865-11.361-125.244l-259.87-80.265-259.872 80.265c-5.594 63.132-13.131 145.767-23.291 253.286-15.462 191.766 168.32 319.934 283.084 380.657 90.57-48.02 224.132-138.345 268.744-270H641.89V659.83H1120.445c.839 8.922 1.698 18.028 2.576 27.322 27.992 346.838-297.711 537.205-439.05 602.998l-41.958 19.542zm601.639-1067.63l-3.031-57.169L642.05.005 43.58 185.127l-3.107 55.245c-.952 15.482-7.013 105.79-38.288 436.718-32.77 405.99 309.406 680.41 612.42 791.637l27.429 10.063 27.389-10.063c303.014-111.267 645.132-386.348 612.148-795.444-29.585-312.649-36.5-409.134-37.918-431.22z"></path><path d="M2593 421.75l-102.5 105c-58.75-56.25-146.25-87.5-222.5-87.5-187.5 0-301.25 142.5-301.25 322.5 0 143.75 83.75 292.5 301.25 292.5 68.75 0 128.75-15 197.5-70v-155h-223.75v-147.5h375v368.75c-86.25 98.75-195 157.5-348.75 157.5-328.75 0-462.5-216.25-462.5-446.25C1805.5 515.5 1959.25 288 2268 288c117.5 0 235 45 325 133.75zm151.25 150h152.5v322.5c0 93.75 51.25 165 148.75 165 93.75 0 157.5-78.75 157.5-172.5v-315h151.25v617.5H3218l-10-83.75c-63.75 62.5-122.5 92.5-208.75 92.5-147.5 0-255-111.25-255-302.5V571.75zm897.5-2.5V1188h-152.5V569.25h152.5zM3475.5 398c0-118.75 180-118.75 180 0s-180 118.75-180 0zm303.75-83.75h151.25V1188h-151.25V314.25zm583.75 385c-97.5 0-175 68.75-175 180 0 107.5 77.5 181.25 175 181.25 96.25 0 178.75-70 178.75-181.25 0-107.5-82.5-180-178.75-180zm188.75-385h152.5V1188h-142.5l-10-85c-47.5 73.75-123.75 98.75-198.75 98.75-181.25 0-317.5-120-317.5-322.5 0-212.5 133.75-322.5 313.75-322.5 65 0 166.25 35 202.5 98.75V314.25z" fill-rule="nonzero"></path></g></g></svg>
    </a>
</p>

<div align="center">
    <p>
	    <a name="stars"><img src="https://img.shields.io/github/stars/guildso/guildso?style=for-the-badge"></a>
	    <a name="forks"><img src="https://img.shields.io/github/forks/guildso/guildso?logoColor=green&style=for-the-badge"></a>
	    <a name="contributions"><img src="https://img.shields.io/github/contributors/guildso/guildso?logoColor=green&style=for-the-badge"></a>
	    <a name="madeWith"><img src="https://img.shields.io/badge/Made%20with-Markdown-1f425f.svg?style=for-the-badge"></a>
	    <a name="license"><img src="https://img.shields.io/github/license/guildso/guildso?style=for-the-badge"></a>
    </p>
</div>

## 👋 About Guild.so

Guild.so is an open-source self-hosted team management solution.

A guild is a group of people who are on a mission to complete a common goal. Your team is your guild, and this self-hosted solution will put the simplicity back into organizing a team.

Guild.so is a simple dashboard of company announcements, team member availability, and team member status. Keeping it simple, because managing your "management system" shouldn't be a task in itself.

## 🔨 Installation

Guild.so is based on Laravel 8 and Jetstream so you can run it just like a standard Laravel application. Here are 2 ways of running Guild.so:

## 💙 Running on DigitalOcean App Platform

We utilize the ["Deploy to DigitalOcean" Button](https://www.digitalocean.com/docs/app-platform/how-to/add-deploy-do-button) to deploy to the App Platform:

[![Deploy to DO](https://mp-assets1.sfo2.digitaloceanspaces.com/deploy-to-do/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/guildso/guild/tree/main&refcode=dc19b9819d06)

> **NOTE: This repository contains a pre-generated application key stored in the `.do/deploy.template.yaml` YAML file. During the deployment make sure to generate a new App Key and use it instead of the dummy value!**

### ☁ DigitalOcean Spaces

You can utilize the DigitalOcean Spaces to store your static file uploads like profile pictures and etc.

In order to use Spaces make sure to add the following ENV variables:

```
DO_SPACES=true
DO_SPACES_KEY=YOUR_DO_SPACES_KEY
DO_SPACES_SECRET=YOUR_DO_SPACES_SECRET
DO_SPACES_ENDPOINT=YOUR_DO_SPACES_ENDPOINT
DO_SPACES_REGION=YOUR_DO_SPACES_REGION
DO_SPACES_BUCKET=YOUR_DO_SPACES_BUCKET
```

That way if you deploy to the DigitalOcean App platform, your uplodas will be stored to a persistant volume so you won't loose then during the next deploy.

## ✊ Manual Installation

You can use the LaraSail script to get your Linux server ready for Laravel 8:

https://github.com/thedevdojo/larasail

Once your server is up and running use `git clone` to clone the repositry and do a standard Laravel installation:

* Create a Database:

During the installation we need to use a MySQL database. You will need to create a new database and save the credentials for the next step.

* Update the `.env` file

Copy the `.env.example` file to `.env` and update your Database details in there:

```
APP_URL=http://guild.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=guild
DB_USERNAME=guild
DB_PASSWORD=guild_password
```

* Composer Install

```
composer install
```

* Install the NPM dependencies:

```
npm install && npm run dev
```

* Migrate Database

```
php artisan migrate
```

## 🌪 Tails

Guild's frontend was built using **[Tails](http://devdojo.com/tails), a new `kick-ass` drag-and-drop TailwindCSS page builder**!

## 🕸️ Landing Page

A web page showcasing Guild.so:

https://guild.so

The web page was also built using [Tails](http://devdojo.com/tails).

## 👩‍💻 DevDojo Team

The DevDojo is a resource to learn all things web development and web design. Learn on your lunch break or wake up and enjoy a cup of coffee with us to learn something new.

Join this developer community, and we can all learn together, build together, and grow together.

[Join DevDojo](https://devdojo.com/)

For more information, please visit https://www.devdojo.com or follow [@thedevdojo](https://twitter.com/thedevdojo) on Twitter.

## 🤲 Contributing

If you are contributing 🍿 please read the [contributing file](https://github.com/guildso/guildso/blob/main/CONTRIBUTING.md) before submitting your pull requests.

## 🔐 Security Vulnerabilities

If you discover a security vulnerability within Guild.so, please send an e-mail to DevDojo's team via this for here [Support](https://devdojo.com/help). All security vulnerabilities will be promptly addressed.

## 📃 License

The Guild.so project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
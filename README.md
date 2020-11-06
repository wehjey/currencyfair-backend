[![Build Status](https://travis-ci.com/wehjey/currencyfair-backend.svg?branch=master)](https://travis-ci.com/wehjey/currencyfair-backend)

## CurrencyFair Backend

[CLick here to view API Documentation](https://documenter.getpostman.com/view/8350697/TVeiCAj1)

[Click here for frontend view](https://currencyfair-front.web.app)

The API was built using PHP and the Laravel framework. Deployment was done on Heroku using continuous integration with PHPUnit and Travis CI.

I implemented the Repository Design pattern to enhance code maintainability. An example of this is, in the future, there might be a plan to change the datastore to fit other purposes. This approach makes it easy through the created TradeMessageInterface that can be easily implemented. With this, there will be less changes to make in code and previous tests will still run.

I have also applied the Test Driven Development (TDD) approach using PHPUnit. This is done to ensure that bug free code is deployed to the production branch. Tests were written for every endpoint to assert correct json structure and posting of valid information

Frontend is implemented using React JS and Redux. The page is implemented to display a world map with total number of transactions originating from a country. I also have two tables showing transactions and rate changes



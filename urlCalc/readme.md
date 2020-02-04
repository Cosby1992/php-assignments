# URL Calculator

This tiny program can calculate two numbers with an operator. 
It's takes arguments through the url.

to try this application: run a php server instans on your pc in the same folder as this project. 
Now send requests on localhost to get results.

Examples of requests: 

- http://localhost?a=1&b=2&operator=plus (returns a + b or 3)
- http://localhost?a=5&b=1&operator=minus (returns a - b or 4)
- http://localhost?a=10&b=20&operator=multiply (returns a * b or 200)
- http://localhost?a=10&b=20&operator=divide (returns a / b or 0.5) // creates an error on division by zero. 
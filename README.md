# SQL Injections
This is a demo application which is vulnerable to sql injections on purpose.
There are plenty of predefined inputs which can be experimented with.

The application features the following types of SQL injections:
- In-band
    - Tautology
    - Error based
    - UNION based
- Blind
    - Boolean based
    - Time based
- Second order

It does not cover Out-of-band SQL injections.

## How to set it up
1. Import the database called `sql-injections` into some kind of MySQL database.
2. Serve the application on some webserver like e. g. Apache.
3. Play around with it.

## Attention
This is only an example to raise awareness of SQL injections.
Never concatenate user input directly into your SQL statements.
  
**Always use Prepared Statements!**

## Paper (German)
To learn more about SQL injections feel free to read the paper I wrote:  
[SQL Injections (German)](SQL-Injections.pdf)

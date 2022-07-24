# 01-PROJECT-BASIC NOTES

This is the version that a beginner would build. It is not the best, but its the easiest.

To establish a database connection, the instructor recommends to use **pdo** over **mysqli**.

Why PDO?

1. Works with multiple databases besides MySQL such as PostgreSQL and Firebird.
2. Object Oriented with methods and properties
3. Security / Prepard Statements (guard against SQL injections)
4. Unified API to access to multiple databases
5. Three ways to handle errors (silent, warning, exception)

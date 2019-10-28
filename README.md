# Laramore Types

Define all types used by Laramore and its fields


# Installation
## Via composer

In your PHP project, run `composer require laramore/fields`.


# Usage

This package is not meant to be used alone. It bundles all used types in different Laramore packages.

## Elements

Elements are a sort of enumeration. They are managed with no specific order and can have different defined values.

### Operator

An operator represent an SQL operator in a simple way. They are callable by `Op::eq()` for example which represents a `=` operator.

Some operators can have constraints as a `nullable` value, a `collection` as value and so on.

### OperatorManager

Manage all operators. Aliases `Op` or `Operators` are usefull to require a specific operator.


### Type

Define a specific type. It is usefull to have the same one definition for a specific type used by fields, migrations, validations, factories.

### TypeManager

Manager all types. Alias `Types` is usefull to get a specific type.


## Grammars

### GrammarType

Define a new grammar type. It is usefull to create for example a specific spacial field.

### GrammarTypeHandler

Handle new grammar types for a specific grammar. Grammar types could be different for MySQL and PostgreSQL.

### GrammarTypeManager

Handle all grammar type handler.

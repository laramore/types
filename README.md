# Laramore Types

Define all basic types, options and operators used by Laramore and its fields


# Installation
## Via composer

In your PHP project, run `composer require laramore/types`.


# Usage

This package is not meant to be used alone. It bundles all used types in different Laramore packages.

## Elements

Elements are a sort of enumeration. They are managed with no specific order and can have different defined values.

### Operator

An operator represent an SQL operator in a simple way. They are callable by `Operator::equal()` for example which represents an `=` operator.

Some operators can have constraints as a `nullable` value, a `collection` as value and so on.

### OperatorManager

Manage all operators. Alias `Operator` is usefull to require a specific operator.


### Type

Define a specific type. It is usefull to have the same one definition for a specific type used by fields, migrations, validations, factories.

### TypeManager

Manager all types. Alias `Type` is usefull to get a specific type.


### Option

Define a all option applied on fields. It is usefull to define a specific behavior for a field.

### OptionManager

Manager all options. Alias `Option` is usefull to get a specific option.
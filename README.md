# Doctrine orphanedRemove=true
Proof of concept to demonstrate orphaned remove expected functionality

## Requirements
- docker
- ideally a linux or mac with Make

## How to start?

Start by running `make up`

This will download docker images, start their processes including 
composer install of all dependencies

## Run tests

In the console type `make tests`

### Failing with this output

```
Starting doctrineorphanremove_db_1 ... done
........F

--- Failed steps:

001 Scenario: Entity is orphaned when not used by a parent entity      # features/default/OrphanEntityDoctrine.feature:27
      Then I cannot find entity "MainSourceConfig" with id "mainId123" # features/default/OrphanEntityDoctrine.feature:30
        Entity MainSourceConfig with id mainId123 still present  (LogicException)

2 scenarios (1 passed, 1 failed)
9 steps (8 passed, 1 failed)
0m0.67s (19.78Mb)

```
Feature: Allow a owning entity to trigger orphan delets of its related entities when they are not use by a parent or
  a related entity anymore


  Background:
    Given I have SiteConfig
      | field     | value       |
      | url       | mysite.com  |
      | uuid      | uuid1       |
      | mainId    | mainId123   |
      | mainName  | My Main one |
      | extraId   | extraId123  |
      | extraName | Extra ID 1  |
    And I have SiteConfig
      | field     | value       |
      | url       | mysite2.com |
      | uuid      | uuid1       |
      | mainId    | mainId123   |
      | mainName  | My Main one |
      | extraId   | another1    |
      | extraName | Another one |

  Scenario: Entity is not orphaned when still used by a parent entity
    When I delete site config with url "mysite.com"
    Then I can find entity "MainSourceConfig" with id "mainId123"

  Scenario: Entity is orphaned when not used by a parent entity
    When I delete site config with url "mysite.com"
    And I delete site config with url "mysite2.com"
    Then I cannot find entity "MainSourceConfig" with id "mainId123"


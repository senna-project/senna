Feature: Create room
  Background:
    Given I am connected as "senna"

  Scenario: Viewing the dashboard project
    When I am on "/rooms"

    And I fill in "Name" with "SDB"
    And I fill in "Description" with "SDB"
    And I press "Save"
    And I should see "SDB"
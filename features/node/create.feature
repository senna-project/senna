@node
Feature: Create room
  Background:
    Given I am connected as "senna"

  Scenario: Viewing the dashboard project
    When I am on "/nodes?room=1"

    And I fill in "Name" with "Test2"
    And I fill in "code" with "132"
    And I press "Save"
    And I should see "Test2"
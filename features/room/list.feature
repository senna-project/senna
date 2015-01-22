Feature: dashboard room

  Background:
    Given I am connected as "senna"

  Scenario: Viewing the dashboard project
    When I am on "/rooms"

    And I should see "Cuisine"
    And I should see "Salon"
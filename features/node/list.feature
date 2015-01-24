@node
Feature: dashboard room

  Background:
    Given I am connected as "senna"

  Scenario: Viewing the dashboard project
    When I am on "/nodes"

    And I should see "Test"
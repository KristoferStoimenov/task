#Coniq CoffeeBreak
The following classes are used in an application that is used to manage a Development Team’s coffee break preferences - these things are very important!

The application allows the team to specify what they want to eat or drink during their morning coffee break, the application 
can show everyone’s preferences in JSON, XML and HTML and is also able to send a notification to each member of the team on HipChat 
so that they know what they will be having today.

The rest of the office has got jealous and now wants to use the application in their teams, but only the development team has HipChat, 
so it is time to refactor the application so that it can be handed over to other teams that will receive their notifications by email.

Since the application was written in a hurry, and just for the development team, it is not very good or scalable code, 
your task is to refactor the existing code, making it more logical and reusable.  
You should also implement the notification service that that will send emails instead of HipChat notifications - you DO NOT need 
to write code that will actually send email - just show how the class will fit into the application and provide similar functionality.

Included in the attached zip archive are classes and a `composer.json` file to enable you to write and test your code.  
You will no doubt be adding more classes during the refactoring.  We have implemented Doctrine for the entities and repositories
and suggested the Symfony Http Foundation component be used - but you are welcome to create working code in any way that you see fit.
Please provide clear instructions for setting up your solution if you intend it to be runnable.

However you implement the solution - you must provide an explanation of the refactoring decisions that you make and, of course,
covering your code with tests gives a very good explanation of what you have done.

A git repository is included so that you can show the changes and additions you make.


The application should support PHP from version 7.0

##Manifest
- `Controller\CoffeeBreakPreferenceController`
- `Entity\CoffeeBreakPreference`
- `Entity\StaffMember`
- `Repository\CoffeeBreakPreferenceRepository`
- `Repository\StaffMemberRepository`
- `Services\HipChatNotifier`
- `Tests\Services\HipChatNotifierTest`

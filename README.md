A multi-vendor online ordering system with dashboard support for vendors and riders. 


User Role
Admin
Restaurant Owners
Customer
Rider

Front Page
http://www.ansonika.com/fooyes/index.html


Dashboard
https://koki.dexignzone.com/react/?storefront=envato-elements#demo


Restaurant has many Menus
Menus has many Food Items
Restaurant has many Food Items through Menu
Food Item has many Food Category
Food Category belongs to many Food Item

Customer has many Order
Order belongs to Customer
Order has many order_item
order item belongs to order

Payment belongs to Order , Customer
Payment
    order_id
    customer_id
    total_amount_payable
    amount_paid
    change

Rider has many Food Deliveries
Food Delivery belongs to Rider , Order
Rider has many Food Delivery
Order has one Food Delivery
Food Delivery  
    rider_id
    order_id

@TODO - install Larastan
@TODO - upload to github
@TODO - dashboard for admin
    - manage order , 
    - manage menu 
    - manage food 
    - manage review  
@TODO - dashboard for vendor
  - manage their order
  - manage their menu
  - manage their food
  - manage their review
@TODO - dashboard for rider
  - view order
  - view payments







APP IDEA

order upfront 

allow user to create their order 
on their phone or website 

and when they are at the cashier 
they will just scan the qr code 

and the order will be queued up 

-- this will fix the queue line issue 
on 
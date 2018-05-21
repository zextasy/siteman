@component('mail::message')


#Hello, **{{$human->name}}** <br>
You have been registered on the Site Management System of Molcom Multi-Concepts Limited<br>
Kindly View your Login details Below.<br>

@component('mail::panel')
#Login Username  **{{$human->email}}**<br>
#Login Password  **{{$human->password}}**<br>

Note: If you have recieved this mail in error kindly ignore and delete immediately.
@endcomponent
Thanks.<br>
Administrator.

@endcomponent

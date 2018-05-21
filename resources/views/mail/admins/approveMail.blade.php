@component('mail::message')

![alt text](http://localhost/siteman/public/images/siteman.png "site-man")<br>


Hello, **{{$user->name}}** <br>
Your task has been approved , see details below.<br>
Title,  **{{$tasks->task_name}}** <br>

@component('mail::panel')
# **{{$tasks->task_description}}** <br>
# STARTS on **{{$tasks->start_date}}** Till **{{$tasks->end_date}}** <br>

Thanks for your service <br>

Note if you have recieved this email in error kindly delete immediately.<br>
@endcomponent

Best regards **{{$tasks->assignedBy->name}}**
@endcomponent

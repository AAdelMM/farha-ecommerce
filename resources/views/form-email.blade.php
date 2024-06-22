<div >
<h3>New message From {{$request->email}}</h3>

<div> Name: {{$request->name}} </div>
<div> Email: {{$request->email}} </div>
<div> Subject: {{$request->subject}} </div>
<div> Message: </div>
<div>

    {{$request->message}}

</div>

</div>
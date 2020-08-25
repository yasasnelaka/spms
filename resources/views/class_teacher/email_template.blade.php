
<p>{{$data['date']}}</p>
<p>To Whom it may concern,</p>
<p>I am writing to recommend {{$data['full_name']}} for {{$data['recommendation_for']}} .</p>

<p>This student is in my class, and performances of this student as mentioned below</p>

<p>Extra curricular activities : </p>
<p><?php

    foreach( $data['performance'] as $performance ){

   echo implode(",",$performance);
    }
    ?></p>

<p>Other qualifications :</p>
<p>{{$data['other_qualification']}}</p>

<p>{{$data['description']}}</p>

<p>{{$data['full_name']}}</p>

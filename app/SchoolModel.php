<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolModel extends Model
{
    public $fillable = ['SchoolName', 'Address', 'Phone', 'Logo', 'Motto', 'Color', 'Website', 'Facilities', 'StrongPoint', 'Comment', 'UpcomingEvent', 'AdmissionRequiremnet', 'SchoolFees', 'Iss_ID'];
}

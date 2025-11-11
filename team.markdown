---
layout: default
title: Team - Cognitive Robotics Lab
permalink: /team/
# permalink: /team/
---
<!-- <h2>Lab members</h2> -->

<section>

    <h5> Under Construction</h5> 
    <p>Please join our team at <a href="/joinus.html">Cognitive Robotics Lab </a> </p>
   {% for group in site.data.team %}
        {% if group.people.size > 0 %}
        <div class="row" >
            <h4 style="margin-top: 10px; margin-bottom: 10px;">{{group.name}}</h4>
            <!-- {{ group | inspect }} -->
            <div class="row">
                <div class="row">
                    {% for item in group.people %}
                    <div class="col-sm12 col-md-6 col-md-3">
                        <a href="{{item.url}}">
                            <div ><img class="photo" src="{{item.image}}" ></div>
                            <div class="name" >{{item.name}}</div>
                        </a>
                        <div class="title">{{item.department}}</div>
                        <div class="title">{{item.title}}</div>
                        {% if item.buildingRoom != nil %}
                        <div class="buildingRoom">Office: {{item.buildingRoom}}</div>
                        {% endif %}
                        {% if item.phone != nil %}
                        <div class="phone">Phone: <a href="tel:{{item.phone}}">{{item.phone}}</a></div>
                        {% endif %}
                        <div class="email">Email: <a href="mailto:{{item.email}}">{{item.email}}</a></div>
                    </div>
                    {% endfor %}
                </div> 
            </div>  
        </div>
        {% endif %}
    {% endfor %}
</section>
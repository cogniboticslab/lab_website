---
layout: default
title: Cognitive Robotics Lab - Univesirity of Arkansas
# description: {{site.description}}
permalink: / 
---


<div class="hero-banner ">
    <div class="hero-overlay">
        <h3 class ="hero-text" >{{site.title}}</h3>
        <p class ="hero-text">{{site.description}} </p>
    </div>
</div>

<section class="news">
    <h4>News & Events</h4>
    <ul>
        {% for item in site.data.news %}
            {% if item.link%}
            <li><strong>{{item.date}} : </strong> <a href="{{item.link}}"> {{ item.event }}</a></li>
            {% else %}
            <li><strong>{{item.date}} : </strong> {{ item.event }}</li>
            {% endif %}
        {% endfor %}
    </ul>
</section>


<section>
<h4>Projects</h4>
<h5>Rosie: Baxter-customized robot</h5>
<div class="row">
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/rosie_perception.jpg" class="image-project" alt="Baxter-customized robot"/>
        <p style="text-align: center;">Perception and Manipulation</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/rosie_slam.jpg" class="image-project" alt="Baxter-customized robot"/>
        <p style="text-align: center;">SLAM in Dynamic Environments</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/rosie_map.jpg" class="image-project" alt="Baxter-customized robot"/>
        <p style="text-align: center;">Human-like Topological Map</p>
    </div>
</div>

<h5>Industrial Robot Controllers</h5>
<div class="row">
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/controller_01.jpg" class="image-project" alt="Robot Controller"/>
        <p style="text-align: center;">Multi-robot controller using EtherCat </p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/controller_03.jpg" class="image-project" alt="Robot Controller"/>
        <p style="text-align: center;">Moving Magnets</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/controller_02.jpg" class="image-project" alt="Robot Controller"/>
        <p style="text-align: center;">Motion Controller: 64 sync axes</p>
    </div>
</div>


<h5>Robot Teaching Hardware/Software</h5>
<div class="row">
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/tp7hw2.jpg" class="image-project" alt="Robot Teaching"/>
        <p style="text-align: center;">Teaching Pendant 7 inches (ARM-based, Linux)</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/tp3.jpg" class="image-project" alt="Robot Teaching"/>
        <p style="text-align: center;">Teaching Pendant 5 inches (STM32, bare-metal)</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/sim_osc.jpg" class="image-project"  alt="Robot Teaching"/>
        <p style="text-align: center;">Oscilloscope</p>
    </div>
</div>

<h5>Embeded Systems</h5>
<div class="row">
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/iotree_01.jpg" class="image-project" alt="iotree"/>
        <p style="text-align: center;">IoTree System</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/iotree_02.jpg" class="image-project"  alt="iotree"/>
        <p style="text-align: center;">IoTree Prototype</p>
    </div>
    <div class="col-sm12 col-md-4">
        <image src="/assets/images/projects/iotree_realworld.jpg" class="image-project"  alt="iotree"/>
        <p style="text-align: center;">IoTree in Real World</p>
    </div>
</div>

</section>

<!-- {% assign page = "index" %} -->
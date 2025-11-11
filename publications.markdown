---
layout: default
title: Publications - Cognitive Robotics Lab
permalink: /publications/
---

<section  >
    <!-- <ul> -->
        <!-- {% for item in site.data.publications reversed %} -->
            <!-- <li>{{item.Authors}} <strong>{{item.Title}}</strong>, {{item.Publication}}, {{item.Year}}</li> -->
        <!--  -->
        <!-- {% endfor %} -->
    <!-- </ul> -->
    {% for item in site.data.publications reversed %}
     <!-- <hr> -->
    <div class="row" style="margin-bottom:15px"> 
        
        <div class="col-sm12 col-md-4">
            {% if item.Image%}
                <image src="/assets/images/publications/{{item.Image}}" class="image-project" alt="{{item.Image}}"/>
            {% endif %}
        </div>
        <div class="col-sm12 col-md-8">
            <p><strong>{{item.Title}}</strong></p> 
            <p>{{item.Authors}}</p>
            <p>{{item.Publication}}</p>
            <p>Year: {{item.Year}}</p>
            <div class="d-flex">
                {% if item.Paper%}
                    <a href="{{item.Paper}}" class="btn btn-light btn-sm me-2">Paper</a>
                {% endif %}

                {% if item.Code%}
                    <a href="{{item.Code}}" class="btn btn-light btn-sm me-2">Code</a>
                {% endif %}

                {% if item.Video %}
                    <a href="{{item.Video}}" class="btn btn-light btn-sm">Video</a>
                {% endif %}
            </div>
        </div>
        
    </div>
   
    {% endfor %}
</section>
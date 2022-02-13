

<div class="container">

<!-- <div id="the-basics">
<input class="typeahead form-control" type="text" placeholder="Search Film Name" autocomplete="off">
</div> -->


<form action="<?php echo base_url(); ?>project_report" method="post" id="report_form">
    <h6 class="text-muted">Choose Project</h6>

      <?php require_once('project_select.php'); ?>

    </form>

<div>

<hr>

    <div id ="report"></div>

</div>

<!-- data-imagesrc="<?php echo base_url();?>assets/images/project.png" -->

<script>
$(document).ready(function(){

    $("#selector").ddslick({
    selectText: "Select Project",
    width: '100%',
    background:'#ffffff',
    imagePosition: "left",
    height:200,
    onSelected: function(selectedData){
       console.log(selectedData.selectedData);
        //$('#report_form').submit();
        showLoader()

        $.ajax({
            url:'<?=base_url()?>project_report',
            method:'Post',
            data:{'project':selectedData.selectedData.value},
            success:function(response){
                $('#report').html(response);
                hideLoader();
            }
        });

     }
    });


});
    

var states = new Bloodhound({
datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
queryTokenizer: Bloodhound.tokenizers.whitespace,
local: [
{'name':'Dhoom', 'image': 'https://m.media-amazon.com/images/M/MV5BM2E0NWJlNzYtZjFlZS00NDU4LWI0OTAtYTZlYjc2MmQ2MjdmXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_SX86_CR0,0,86,86_.jpg'},
{'name':'race', 'image': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQl0UEtp4TVEwV-QLy4HN8pdvUyZSSKeAs5MPHeNZyLjaMDQNi'},
{'name':'dabangg', 'image': 'http://gangbuzzz.com/wp-content/uploads/2018/05/Salman-khan-mouni-roy-Sonakshi-Sinha-arbaaz-khan-upcoming-film-dabangg-3-150x150.jpg'},
{'name':'policegiri', 'image': 'https://i.pinimg.com/originals/f9/71/19/f97119560f489a8eeda6220048d7a3e3.jpg'},
{'name':'dhamaal', 'image': 'https://c.saavncdn.com/744/Dhamaal-Hindi-2009-150x150.jpg'},
{'name':'bahubali', 'image': 'http://t.mp3load.vc/c/4569_4.jpg'},
{'name':'dhoni', 'image': 'http://northbridgetimes.com/wp-content/uploads/2016/09/ms-dhoni-the-untold-story-poster-150x150.jpg'},
{'name':'Dangal', 'image': 'https://upcomingmoviesdate.com/wp-content/uploads/2016/10/Dangal-Poster-150x150.jpg'},
]
});

states.initialize();

$('#the-basics .typeahead').typeahead({
hint: true,
highlight: true,
showHintOnFocus: true,
minLength: 0
},
{
name: 'states',
display: 'name',
source: states.ttAdapter(),
templates: {
/*empty: [
'<div class="empty-message">',
'Type here to search project by name !',
'</div>'
].join('\n'),*/
suggestion: function (data) {
return '<div class="man-section"><div class="image-section"><img src='+data.image+'></div><div class="description-section"><h1>'+data.name+'</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><span><i class="fa fa-clock-o" aria-hidden="true"></i> 12:00 PM  <i class="fa fa-map-marker" aria-hidden="true"></i> Rajkot</span><div class="more-section"><a href="https://nicesnippets.com" target="_blank"><button>More Info</button></a></div></div><div style="clear:both;"></div></div>';
}
},
});

$('#the-basics .typeahead').on('focus', function() {
  $(this).val("d").trigger('propertychange');
});

</script>


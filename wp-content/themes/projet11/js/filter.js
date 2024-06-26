const url =  js_filter_js.ajax_url
const  formData = new FormData();

formData.append( 'action', 'single_post_ajax' );

fetch(url,  
      {
            method: 'POST',
            body: formData,
      }
)
      .then(response => response.text())
      .then(data => console.log(data))
      

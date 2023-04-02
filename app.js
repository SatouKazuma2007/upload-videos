$(document).ready(function() {
	$.ajax({
		type: "GET",
		url: "get_videos.php",
		dataType: "json",
		success: function(data) {
			if (data.length > 0) {
				var videoContainer = $("#video-container");
				$.each(data, function(i, video) {
					var title = video.title;
					var videoUrl = video.url;
					videoContainer.append('<h2>' + title + '</h2><video width="320" height="240" controls><source src="' + videoUrl + '" type="video/mp4"></video>');
				});
			}
		}
	});
});

document.addEventListener('DOMContentLoaded', function() {
    var changeClass = function (r, className1, className2) {
        var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
        if (regex.test(r.className)) {
            r.className = r.className.replace(regex, ' ' + className2 + ' ');
        } else {
            r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"), ' ' + className1 + ' ');
        }
        return r.className;
    };

		var menuToggle = document.getElementById('menu-toggle');
		var menu = document.getElementById('menu');
	
		menuToggle.addEventListener('click', function() {
			if (menu.style.display === 'block') {
				menu.style.display = 'none';
			} else {
				menu.style.display = 'block';
			}
		});
	
	
});

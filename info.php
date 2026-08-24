<?php
// phpinfo() leaks the server's full configuration (paths, extensions, versions)
// to anyone who requests this URL, so it is disabled here.
// To inspect it temporarily, run `php -i` on the server instead.
http_response_code(404);
exit('Not Found');

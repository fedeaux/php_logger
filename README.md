<h1> An easy socket-based terminal logger for PHP </h1>

<p> run <code>ruby logger.rb</code> on a terminal </p>

<h2> On codeigniter </h2>
$this->load->library('logger');
$this->logger->log($something);

/* A good alias to consider */
function _log($obj) {
  $CI =& get_instance();
  return $CI->logger->log($obj);
}

<h2> On raw PHP </h2>
$_logger = new Logger();
$_logger->log($something);

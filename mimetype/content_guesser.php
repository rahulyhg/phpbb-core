<?php
/**
*
* @package phpBB3
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\mimetype;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package mimetype
*/

class content_guesser implements guesser_interface
{
	/**
	* @var file extension map
	*/
	protected $extension_map = array(
		'3dm'		=> 'x-world/x-3dmf',
		'3dmf'		=> 'x-world/x-3dmf',
		'a'		=> 'application/octet-stream',
		'aab'		=> 'application/x-authorware-bin',
		'aam'		=> 'application/x-authorware-map',
		'aas'		=> 'application/x-authorware-seg',
		'abc'		=> 'text/vnd.abc',
		'acgi'		=> 'text/html',
		'afl'		=> 'video/animaflex',
		'ai'		=> 'application/postscript',
		'aif'		=> 'audio/aiff',
		'aifc'		=> 'audio/aiff',
		'aiff'		=> 'audio/aiff',
		'aim'		=> 'application/x-aim',
		'aip'		=> 'text/x-audiosoft-intra',
		'ani'		=> 'application/x-navi-animation',
		'aos'		=> 'application/x-nokia-9000-communicator-add-on-software',
		'aps'		=> 'application/mime',
		'arc'		=> 'application/octet-stream',
		'arj'		=> 'application/arj',
		'art'		=> 'image/x-jg',
		'asf'		=> 'video/x-ms-asf',
		'asm'		=> 'text/x-asm',
		'asp'		=> 'text/asp',
		'asx'		=> 'video/x-ms-asf',
		'au'		=> 'audio/x-au',
		'avi'		=> 'video/avi',
		'avs'		=> 'video/avs-video',
		'bcpio'		=> 'application/x-bcpio',
		'bin'		=> 'application/x-binary',
		'bm'		=> 'image/bmp',
		'bmp'		=> 'image/bmp',
		'boo'		=> 'application/book',
		'book'		=> 'application/book',
		'boz'		=> 'application/x-bzip2',
		'bsh'		=> 'application/x-bsh',
		'bz'		=> 'application/x-bzip',
		'bz2'		=> 'application/x-bzip2',
		'c'		=> 'text/x-c',
		'c++'		=> 'text/x-c',
		'cat'		=> 'application/vnd.ms-pki.seccat',
		'cc'		=> 'text/plain',
		'ccad'		=> 'application/clariscad',
		'cco'		=> 'application/x-cocoa',
		'cdf'		=> 'application/cdf',
		'cer'		=> 'application/x-x509-ca-cert',
		'cha'		=> 'application/x-chat',
		'chat'		=> 'application/x-chat',
		'class'		=> 'application/java',
		'com'		=> 'application/octet-stream',
		'conf'		=> 'text/plain',
		'cpio'		=> 'application/x-cpio',
		'cpp'		=> 'text/x-c',
		'cpt'		=> 'application/x-cpt',
		'crl'		=> 'application/pkix-crl',
		'crt'		=> 'application/x-x509-ca-cert',
		'csh'		=> 'application/x-csh',
		'css'		=> 'text/css',
		'cxx'		=> 'text/plain',
		'dcr'		=> 'application/x-director',
		'deepv'		=> 'application/x-deepv',
		'def'		=> 'text/plain',
		'der'		=> 'application/x-x509-ca-cert',
		'dif'		=> 'video/x-dv',
		'dir'		=> 'application/x-director',
		'dl'		=> 'video/dl',
		'doc'		=> 'application/msword',
		'dot'		=> 'application/msword',
		'dp'		=> 'application/commonground',
		'drw'		=> 'application/drafting',
		'dump'		=> 'application/octet-stream',
		'dv'		=> 'video/x-dv',
		'dvi'		=> 'application/x-dvi',
		'dwf'		=> 'model/vnd.dwf',
		'dwg'		=> 'image/x-dwg',
		'dxf'		=> 'image/x-dwg',
		'dxr'		=> 'application/x-director',
		'el'		=> 'text/x-script.elisp',
		'elc'		=> 'application/x-elc',
		'env'		=> 'application/x-envoy',
		'eps'		=> 'application/postscript',
		'es'		=> 'application/x-esrehber',
		'etx'		=> 'text/x-setext',
		'evy'		=> 'application/x-envoy',
		'exe'		=> 'application/octet-stream',
		'f'		=> 'text/x-fortran',
		'f77'		=> 'text/x-fortran',
		'f90'		=> 'text/x-fortran',
		'fdf'		=> 'application/vnd.fdf',
		'fif'		=> 'image/fif',
		'fli'		=> 'video/x-fli',
		'flo'		=> 'image/florian',
		'flx'		=> 'text/vnd.fmi.flexstor',
		'fmf'		=> 'video/x-atomic3d-feature',
		'for'		=> 'text/x-fortran',
		'fpx'		=> 'image/vnd.fpx',
		'frl'		=> 'application/freeloader',
		'funk'		=> 'audio/make',
		'g'		=> 'text/plain',
		'g3'		=> 'image/g3fax',
		'gif'		=> 'image/gif',
		'gl'		=> 'video/x-gl',
		'gsd'		=> 'audio/x-gsm',
		'gsm'		=> 'audio/x-gsm',
		'gsp'		=> 'application/x-gsp',
		'gss'		=> 'application/x-gss',
		'gtar'		=> 'application/x-gtar',
		'gz'		=> 'application/x-gzip',
		'gzip'		=> 'application/x-gzip',
		'h'		=> 'text/x-h',
		'hdf'		=> 'application/x-hdf',
		'help'		=> 'application/x-helpfile',
		'hgl'		=> 'application/vnd.hp-hpgl',
		'hh'		=> 'text/x-h',
		'hlb'		=> 'text/x-script',
		'hlp'		=> 'application/hlp',
		'hpg'		=> 'application/vnd.hp-hpgl',
		'hpgl'		=> 'application/vnd.hp-hpgl',
		'hqx'		=> 'application/x-binhex40',
		'hta'		=> 'application/hta',
		'htc'		=> 'text/x-component',
		'htm'		=> 'text/html',
		'html'		=> 'text/html',
		'htmls'		=> 'text/html',
		'htt'		=> 'text/webviewhtml',
		'htx'		=> 'text/html',
		'ice'		=> 'x-conference/x-cooltalk',
		'ico'		=> 'image/x-icon',
		'idc'		=> 'text/plain',
		'ief'		=> 'image/ief',
		'iefs'		=> 'image/ief',
		'iges'		=> 'application/iges',
		'igs'		=> 'application/iges',
		'ima'		=> 'application/x-ima',
		'imap'		=> 'application/x-httpd-imap',
		'inf'		=> 'application/inf',
		'ins'		=> 'application/x-internett-signup',
		'ip'		=> 'application/x-ip2',
		'isu'		=> 'video/x-isvideo',
		'it'		=> 'audio/it',
		'iv'		=> 'application/x-inventor',
		'ivr'		=> 'i-world/i-vrml',
		'ivy'		=> 'application/x-livescreen',
		'jam'		=> 'audio/x-jam',
		'jav'		=> 'text/plain',
		'jav'		=> 'text/x-java-source',
		'java'		=> 'text/x-java-source',
		'jcm'		=> 'application/x-java-commerce',
		'jfif'		=> 'image/jpeg',
		'jfif-tbnl'	=> 'image/jpeg',
		'jpe'		=> 'image/jpeg',
		'jpeg'		=> 'image/jpeg',
		'jpg'		=> 'image/jpeg',
		'jps'		=> 'image/x-jps',
		'js'		=> 'application/x-javascript',
		'jut'		=> 'image/jutvision',
		'kar'		=> 'audio/midi',
		'ksh'		=> 'text/x-script.ksh',
		'la'		=> 'audio/x-nspaudio',
		'lam'		=> 'audio/x-liveaudio',
		'latex'		=> 'application/x-latex',
		'lha'		=> 'application/x-lha',
		'lhx'		=> 'application/octet-stream',
		'list'		=> 'text/plain',
		'lma'		=> 'audio/x-nspaudio',
		'log'		=> 'text/plain',
		'lsp'		=> 'text/x-script.lisp',
		'lst'		=> 'text/plain',
		'lsx'		=> 'text/x-la-asf',
		'ltx'		=> 'application/x-latex',
		'lzh'		=> 'application/x-lzh',
		'lzx'		=> 'application/x-lzx',
		'm'		=> 'text/x-m',
		'm1v'		=> 'video/mpeg',
		'm2a'		=> 'audio/mpeg',
		'm2v'		=> 'video/mpeg',
		'm3u'		=> 'audio/x-mpequrl',
		'man'		=> 'application/x-troff-man',
		'map'		=> 'application/x-navimap',
		'mar'		=> 'text/plain',
		'mbd'		=> 'application/mbedlet',
		'mc$'		=> 'application/x-magic-cap-package-1.0',
		'mcd'		=> 'application/x-mathcad',
		'mcf'		=> 'text/mcf',
		'mcp'		=> 'application/netmc',
		'me'		=> 'application/x-troff-me',
		'mht'		=> 'message/rfc822',
		'mhtml'		=> 'message/rfc822',
		'mid'		=> 'audio/x-midi',
		'midi'		=> 'audio/x-midi',
		'mif'		=> 'application/x-mif',
		'mime'		=> 'www/mime',
		'mjf'		=> 'audio/x-vnd.audioexplosion.mjuicemediafile',
		'mjpg'		=> 'video/x-motion-jpeg',
		'mm'		=> 'application/x-meme',
		'mme'		=> 'application/base64',
		'mod'		=> 'audio/x-mod',
		'moov'		=> 'video/quicktime',
		'mov'		=> 'video/quicktime',
		'movie'		=> 'video/x-sgi-movie',
		'mp2'		=> 'audio/x-mpeg',
		'mp3'		=> 'audio/x-mpeg-3',
		'mpa'		=> 'audio/mpeg',
		'mpc'		=> 'application/x-project',
		'mpe'		=> 'video/mpeg',
		'mpeg'		=> 'video/mpeg',
		'mpg'		=> 'video/mpeg',
		'mpga'		=> 'audio/mpeg',
		'mpp'		=> 'application/vnd.ms-project',
		'mpt'		=> 'application/x-project',
		'mpv'		=> 'application/x-project',
		'mpx'		=> 'application/x-project',
		'mrc'		=> 'application/marc',
		'ms'		=> 'application/x-troff-ms',
		'mv'		=> 'video/x-sgi-movie',
		'my'		=> 'audio/make',
		'mzz'		=> 'application/x-vnd.audioexplosion.mzz',
		'nap'		=> 'image/naplps',
		'naplps'	=> 'image/naplps',
		'nc'		=> 'application/x-netcdf',
		'ncm'		=> 'application/vnd.nokia.configuration-message',
		'nif'		=> 'image/x-niff',
		'niff'		=> 'image/x-niff',
		'nix'		=> 'application/x-mix-transfer',
		'nsc'		=> 'application/x-conference',
		'nvd'		=> 'application/x-navidoc',
		'o'		=> 'application/octet-stream',
		'oda'		=> 'application/oda',
		'omc'		=> 'application/x-omc',
		'omcd'		=> 'application/x-omcdatamaker',
		'omcr'		=> 'application/x-omcregerator',
		'p'		=> 'text/x-pascal',
		'p10'		=> 'application/x-pkcs10',
		'p12'		=> 'application/x-pkcs12',
		'p7a'		=> 'application/x-pkcs7-signature',
		'p7c'		=> 'application/x-pkcs7-mime',
		'p7m'		=> 'application/x-pkcs7-mime',
		'p7r'		=> 'application/x-pkcs7-certreqresp',
		'p7s'		=> 'application/pkcs7-signature',
		'part'		=> 'application/pro_eng',
		'pas'		=> 'text/pascal',
		'pbm'		=> 'image/x-portable-bitmap',
		'pcl'		=> 'application/x-pcl',
		'pct'		=> 'image/x-pict',
		'pcx'		=> 'image/x-pcx',
		'pdb'		=> 'chemical/x-pdb',
		'pdf'		=> 'application/pdf',
		'pfunk'		=> 'audio/make.my.funk',
		'pgm'		=> 'image/x-portable-greymap',
		'pic'		=> 'image/pict',
		'pict'		=> 'image/pict',
		'pkg'		=> 'application/x-newton-compatible-pkg',
		'pko'		=> 'application/vnd.ms-pki.pko',
		'pl'		=> 'text/x-script.perl',
		'plx'		=> 'application/x-pixclscript',
		'pm'		=> 'text/x-script.perl-module',
		'pm4'		=> 'application/x-pagemaker',
		'pm5'		=> 'application/x-pagemaker',
		'png'		=> 'image/png',
		'pnm'		=> 'image/x-portable-anymap',
		'pot'		=> 'application/mspowerpoint',
		'pov'		=> 'model/x-pov',
		'ppa'		=> 'application/vnd.ms-powerpoint',
		'ppm'		=> 'image/x-portable-pixmap',
		'pps'		=> 'application/mspowerpoint',
		'ppt'		=> 'application/mspowerpoint',
		'ppz'		=> 'application/mspowerpoint',
		'pre'		=> 'application/x-freelance',
		'prt'		=> 'application/pro_eng',
		'ps'		=> 'application/postscript',
		'psd'		=> 'application/octet-stream',
		'pvu'		=> 'paleovu/x-pv',
		'pwz'		=> 'application/vnd.ms-powerpoint',
		'py'		=> 'text/x-script.phyton',
		'pyc'		=> 'applicaiton/x-bytecode.python',
		'qcp'		=> 'audio/vnd.qcelp',
		'qd3'		=> 'x-world/x-3dmf',
		'qd3d'		=> 'x-world/x-3dmf',
		'qif'		=> 'image/x-quicktime',
		'qt'		=> 'video/quicktime',
		'qtc'		=> 'video/x-qtc',
		'qti'		=> 'image/x-quicktime',
		'qtif'		=> 'image/x-quicktime',
		'ra'		=> 'audio/x-realaudio',
		'ram'		=> 'audio/x-pn-realaudio',
		'ras'		=> 'image/x-cmu-raster',
		'rast'		=> 'image/cmu-raster',
		'rexx'		=> 'text/x-script.rexx',
		'rf'		=> 'image/vnd.rn-realflash',
		'rgb'		=> 'image/x-rgb',
		'rm'		=> 'audio/x-pn-realaudio',
		'rmi'		=> 'audio/mid',
		'rmm'		=> 'audio/x-pn-realaudio',
		'rmp'		=> 'audio/x-pn-realaudio',
		'rng'		=> 'application/vnd.nokia.ringing-tone',
		'rnx'		=> 'application/vnd.rn-realplayer',
		'roff'		=> 'application/x-troff',
		'rp'		=> 'image/vnd.rn-realpix',
		'rpm'		=> 'audio/x-pn-realaudio-plugin',
		'rt'		=> 'text/richtext',
		'rtf'		=> 'text/richtext',
		'rtx'		=> 'text/richtext',
		'rv'		=> 'video/vnd.rn-realvideo',
		's'		=> 'text/x-asm',
		's3m'		=> 'audio/s3m',
		'saveme'	=> 'application/octet-stream',
		'sbk'		=> 'application/x-tbook',
		'scm'		=> 'video/x-scm',
		'sdml'		=> 'text/plain',
		'sdp'		=> 'application/x-sdp',
		'sdr'		=> 'application/sounder',
		'sea'		=> 'application/x-sea',
		'set'		=> 'application/set',
		'sgm'		=> 'text/x-sgml',
		'sgml'		=> 'text/x-sgml',
		'sh'		=> 'text/x-script.sh',
		'shar'		=> 'application/x-shar',
		'shtml'		=> 'text/x-server-parsed-html',
		'sid'		=> 'audio/x-psid',
		'sit'		=> 'application/x-stuffit',
		'skd'		=> 'application/x-koan',
		'skm'		=> 'application/x-koan',
		'skp'		=> 'application/x-koan',
		'skt'		=> 'application/x-koan',
		'sl'		=> 'application/x-seelogo',
		'smi'		=> 'application/smil',
		'smil'		=> 'application/smil',
		'snd'		=> 'audio/x-adpcm',
		'sol'		=> 'application/solids',
		'spc'		=> 'text/x-speech',
		'spl'		=> 'application/futuresplash',
		'spr'		=> 'application/x-sprite',
		'sprite'	=> 'application/x-sprite',
		'src'		=> 'application/x-wais-source',
		'ssi'		=> 'text/x-server-parsed-html',
		'ssm'		=> 'application/streamingmedia',
		'sst'		=> 'application/vnd.ms-pki.certstore',
		'step'		=> 'application/step',
		'stl'		=> 'application/vnd.ms-pki.stl',
		'stp'		=> 'application/step',
		'sv4cpio'	=> 'application/x-sv4cpio',
		'sv4crc'	=> 'application/x-sv4crc',
		'svf'		=> 'image/x-dwg',
		'svr'		=> 'application/x-world',
		'swf'		=> 'application/x-shockwave-flash',
		't'		=> 'application/x-troff',
		'talk'		=> 'text/x-speech',
		'tar'		=> 'application/x-tar',
		'tbk'		=> 'application/x-tbook',
		'tcl'		=> 'text/x-script.tcl',
		'tcsh'		=> 'text/x-script.tcsh',
		'tex'		=> 'application/x-tex',
		'texi'		=> 'application/x-texinfo',
		'texinfo'	=> 'application/x-texinfo',
		'text'		=> 'text/plain',
		'tgz'		=> 'application/x-compressed',
		'tif'		=> 'image/tiff',
		'tiff'		=> 'image/tiff',
		'tr'		=> 'application/x-troff',
		'tsi'		=> 'audio/tsp-audio',
		'tsp'		=> 'audio/tsplayer',
		'tsv'		=> 'text/tab-separated-values',
		'turbot'	=> 'image/florian',
		'txt'		=> 'text/plain',
		'uil'		=> 'text/x-uil',
		'uni'		=> 'text/uri-list',
		'unis'		=> 'text/uri-list',
		'unv'		=> 'application/i-deas',
		'uri'		=> 'text/uri-list',
		'uris'		=> 'text/uri-list',
		'ustar'		=> 'multipart/x-ustar',
		'uu'		=> 'text/x-uuencode',
		'uue'		=> 'text/x-uuencode',
		'vcd'		=> 'application/x-cdlink',
		'vcs'		=> 'text/x-vcalendar',
		'vda'		=> 'application/vda',
		'vdo'		=> 'video/vdo',
		'vew'		=> 'application/groupwise',
		'viv'		=> 'video/vivo',
		'vivo'		=> 'video/vivo',
		'vmd'		=> 'application/vocaltec-media-desc',
		'vmf'		=> 'application/vocaltec-media-file',
		'voc'		=> 'audio/voc',
		'vos'		=> 'video/vosaic',
		'vox'		=> 'audio/voxware',
		'vqe'		=> 'audio/x-twinvq-plugin',
		'vqf'		=> 'audio/x-twinvq',
		'vql'		=> 'audio/x-twinvq-plugin',
		'vrml'		=> 'application/x-vrml',
		'vrt'		=> 'x-world/x-vrt',
		'vsd'		=> 'application/x-visio',
		'vst'		=> 'application/x-visio',
		'vsw'		=> 'application/x-visio',
		'w60'		=> 'application/wordperfect6.0',
		'w61'		=> 'application/wordperfect6.1',
		'w6w'		=> 'application/msword',
		'wav'		=> 'audio/wav',
		'wb1'		=> 'application/x-qpro',
		'wbmp'		=> 'image/vnd.wap.wbmp',
		'web'		=> 'application/vnd.xara',
		'wiz'		=> 'application/msword',
		'wk1'		=> 'application/x-123',
		'wmf'		=> 'windows/metafile',
		'wml'		=> 'text/vnd.wap.wml',
		'wmlc'		=> 'application/vnd.wap.wmlc',
		'wmls'		=> 'text/vnd.wap.wmlscript',
		'wmlsc'		=> 'application/vnd.wap.wmlscriptc',
		'word'		=> 'application/msword',
		'wp'		=> 'application/wordperfect',
		'wp5'		=> 'application/wordperfect',
		'wp6'		=> 'application/wordperfect',
		'wpd'		=> 'application/wordperfect',
		'wq1'		=> 'application/x-lotus',
		'wri'		=> 'application/mswrite',
		'wrl'		=> 'model/vrml',
		'wrz'		=> 'model/vrml',
		'wsc'		=> 'text/scriplet',
		'wsrc'		=> 'application/x-wais-source',
		'wtk'		=> 'application/x-wintalk',
		'xbm'		=> 'image/xbm',
		'xdr'		=> 'video/x-amt-demorun',
		'xgz'		=> 'xgl/drawing',
		'xif'		=> 'image/vnd.xiff',
		'xl'		=> 'application/excel',
		'xla'		=> 'application/excel',
		'xlb'		=> 'application/excel',
		'xlc'		=> 'application/excel',
		'xld'		=> 'application/excel',
		'xlk'		=> 'application/excel',
		'xll'		=> 'application/excel',
		'xlm'		=> 'application/excel',
		'xls'		=> 'application/excel',
		'xlt'		=> 'application/excel',
		'xlv'		=> 'application/excel',
		'xlw'		=> 'application/excel',
		'xm'		=> 'audio/xm',
		'xml'		=> 'text/xml',
		'xmz'		=> 'xgl/movie',
		'xpix'		=> 'application/x-vnd.ls-xpix',
		'xpm'		=> 'image/xpm',
		'x-png'		=> 'image/png',
		'xsr'		=> 'video/x-amt-showrun',
		'xwd'		=> 'image/x-xwindowdump',
		'xyz'		=> 'chemical/x-pdb',
		'z'		=> 'application/x-compressed',
		'zip'		=> 'application/x-zip-compressed',
		'zoo'		=> 'application/octet-stream',
		'zsh'		=> 'text/x-script.zsh',
	);

	/**
	* @inheritdoc
	*/
	public function is_supported()
	{
		return true;
	}

	/**
	* @inheritdoc
	*/
	public function guess($file, $file_name = '')
	{
		$mimetype = null;
		if (function_exists('mime_content_type'))
		{
			$mimetype = mime_content_type($file);
		}
		else
		{
			$file_name = (empty($file_name)) ? $file : $file_name;
			$mimetype = $this->map_extension_to_type($file_name);
		}
		return $mimetype;
	}

	/**
	* Map extension of supplied file_name to mime type
	*
	* @param string $file_name Path to file or filename
	*
	* @return string|null Mimetype if known or null if not
	*/
	protected function map_extension_to_type($file_name)
	{
		$extension = pathinfo($file_name, PATHINFO_EXTENSION);

		if (isset($this->extension_map[$extension]))
		{
			return $this->extension_map[$extension];
		}
		else
		{
			return null;
		}
	}
}

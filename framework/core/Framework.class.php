<?php 
	class Framework {
   		public static function run() {
   			self::init();   	
			self::autoload();
   			self::dispatch();
   		}//run
   
   		private static function init() {
   			// Define path constants
   			define("DS", DIRECTORY_SEPARATOR);
   			define("ROOT", getcwd() . DS);
   			define("APP_PATH", ROOT . 'application' . DS);
   			define("FRAMEWORK_PATH", ROOT . "framework" . DS);
   			define("PUBLIC_PATH", ROOT . "public" . DS);
   			define("CONFIG_PATH", APP_PATH . "config" . DS);
   			define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
   			define("MODEL_PATH", APP_PATH . "models" . DS);
   			define("VIEW_PATH", APP_PATH . "views" . DS);
   			define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
   			define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
   			define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
   			define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);
   			define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);
   			
   			// Define platform, controller, action, for example:
   			// index.php?p=admin&c=Goods&a=add
   			//define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');
   			define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');
   			define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');
   			
   			//define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
   			define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . DS);
   			//define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);
   			define("CURR_VIEW_PATH", VIEW_PATH . DS);
   			
   			// Load configuration file
   			$GLOBALS['config'] = include CONFIG_PATH . "config.php";
   			
   			// Load core classes
   			require CORE_PATH . "Controller.class.php";
   			require CORE_PATH . "Loader.class.php";
   			//require DB_PATH . "Mysql.class.php";
   			require DB_PATH . "MyPDO.class.php";
   			require CORE_PATH . "Model.class.php";
   			require LIB_PATH . "fpdf/FPDF.class.php";
   			require HELPER_PATH . "GeneratePDF.class.php";
   			
   			// Start session
   			session_start();
   		}//init
   
   		private static function autoload() {
   			spl_autoload_register(array(__CLASS__,'load'));
   		}//autoload
   
   		private static function load($classname){
   			// Here simply autoload app’s controller and model classes
   			if (substr($classname, -10) == "Controller")
   			{
   				// Controller
   				require_once CURR_CONTROLLER_PATH . "$classname.class.php";
   			} 
   			elseif (substr($classname, -5) == "Model")
   			{
   		    	// Model
   				require_once  MODEL_PATH . "$classname.class.php";
   			}
   		}//load
   
   		private static function dispatch(){
   			// Instantiate the controller class and call its action method
   			$controller_name = CONTROLLER . "Controller";
   			$action_name = ACTION . "Action";
   			$controller = new $controller_name;
   			switch(CONTROLLER)
   			{
   				case 'Sistemas':
   					switch(ACTION)
   					{
   						case 'insert':
   							$controller->$action_name($_POST['sistema'], $_POST['codigo']);
   						break;
   						case 'delete':
   							$controller->$action_name($_POST['idx']);
   						break;
   						case 'update':
   							$controller->$action_name($_POST['idx'], $_POST['sistema'], $_POST['codigo']);
   						break;
   						default:
   							$controller->$action_name();
   					}//switch
   				break;
   				case 'Usuarios':
   					switch(ACTION)
   					{
   						case 'insert':
   							$controller->$action_name($_POST['usuario'], $_POST['password'], $_POST['sistemas']);
   						break;
   						case 'delete':
   							$controller->$action_name($_POST['idx']);
   						break;
   						case 'update':
   							$controller->$action_name($_POST['idx'], $_POST['usuario'], $_POST['password'], $_POST['status'], $_POST['sistemas']);
   						break;
   						default:
   							$controller->$action_name();
   					}//switch
   				break;
   				case 'Plazas':
   				    switch(ACTION)
   				    {
   				        case 'insert':
   				            $controller->$action_name($_POST['nombre'], $_POST['descripcion'], $_POST['ciudad'],$_POST['estado']);
   				            break;
   				        case 'delete':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'update':
   				            $controller->$action_name($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['ciudad'], $_POST['estado']);
   				            break;
   				            
   				        case 'llenarFormaEditar':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'consulta':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        default:
   				            $controller->$action_name();
   				    }//switch
   				    break;
   				case 'Empresas':
   				    switch(ACTION)
   				    {
   				        case 'insert':
   				            $controller->$action_name($_POST['clave'], $_POST['descripcion'], $_POST['tipo'],$_POST['plaza']);
   				            break;
   				        case 'delete':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'update':
   				            $controller->$action_name($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['ciudad'], $_POST['estado']);
   				            break;
   				            
   				        case 'llenarFormaEditar':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'consulta':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        default:
   				            $controller->$action_name();
   				    }//switch
   				    break;
   				case 'Desarrollos':
   				    switch(ACTION)
   				    {
   				        case 'insert':
   				            $controller->$action_name($_POST['nombre'], $_POST['razon'], $_POST['calle'], $_POST['interior'], $_POST['exterior'], $_POST['cp'], $_POST['colonia'], $_POST['localidad'], $_POST['municipio'], $_POST['estado'], $_POST['pais'], $_POST['rfc'], $_POST['telefono'], $_POST['idTrib'], $_POST['paginaWeb'], $_POST['correo'], $_POST['giro']);
   				            break;
   				        case 'update':
   				            $controller->$action_name($_POST['id'], $_POST['nombre'], $_POST['razon'], $_POST['calle'], $_POST['interior'], $_POST['exterior'], $_POST['cp'], $_POST['colonia'], $_POST['localidad'], $_POST['municipio'], $_POST['estado'], $_POST['pais'], $_POST['pais'], $_POST['rfc'], $_POST['telefono'], $_POST['idTrib'], $_POST['paginaWeb'], $_POST['correo'], $_POST['giro']);
   				            break;
   				        case 'delete':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'retrive':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'export':
   				            $controller->$action_name();
   				            break;
   				        default:
   				            $controller->$action_name();
   				    }//switch
   				    break;
   				case 'Giros':
   				    switch(ACTION)
   				    {
   				        case 'insert':
   				            $controller->$action_name($_POST['nombre']);
   				            break;
   				        case 'update':
   				            $controller->$action_name($_POST['id'], $_POST['nombre']);
   				            break;
   				        case 'delete':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'retrive':
   				            $controller->$action_name($_POST['id']);
   				            break;
   				        case 'export':
   				            $controller->$action_name();
   				            break;
   				        default:
   				            $controller->$action_name();
   				    }//switch
   				break;
                                case 'Asociados':
                                    $params = array();
   				    switch(ACTION)
   				    {
   				        case 'insert':
                                            parse_str($_POST['str'], $params);
   				            $controller->$action_name($params);
   				        break;
                                        case 'update':
                                            parse_str($_POST['str'], $params);
   				            $controller->$action_name($params);
   				        break;
   				        case 'delete':
   				            $controller->$action_name($_POST['id']);
   				        break;
   				        case 'retrive':
   				            $controller->$action_name($_POST['id']);
   				        break;
                                        case 'export':
   				            $controller->$action_name();
   				        break;
   				        default:
   				            $controller->$action_name();
   				    }//switch
   				break;
   				default:
   					$controller->$action_name();
   			}//switch
   		}//dispatch
	}//class Framework
?>

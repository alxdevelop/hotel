/**
 * Quark 3 PHP Framework
 * Copyright (C) 2011 Sahib Alejandro Jaramillo Leo
 * 
 * @link http://quarkphp.com
 * @license GNU General Public License (http://www.gnu.org/licenses/gpl.html)
 */
 var Quark = new (function()
{
  var _AJAXOptions = {
    type: 'post',
    dataType: 'json',
    dataHandler: function(Data)
    {
      console.log(Data.data);
    },
    errorHandler: function(Data)
    {
      alert('Error: ' + Data.message);
    }
  };

  var _base_url     = <?php echo json_encode($this->QuarkUrl->baseUrl(null, true)) ?>;
  var _debug        = <?php echo QUARK_DEBUG ? 'true' : 'false' ?>;
  var _friendly_url = <?php echo QUARK_FRIENDLY_URL ? 'true' : 'false' ?>;

  this.ajax = function(url, Options)
  {
    Options = $.extend({}, _AJAXOptions, Options);

    Options.success = function(FullResponse, textStatus, jqXHR)
    {
      if(FullResponse.error){
        // Error en php script
        Quark.showAjaxError(FullResponse.error);
      } else if(FullResponse.access_denied) {
        // Acceso denegado
        Quark.showAjaxAccessDenied(url);
      } else if(FullResponse.not_found) {
        // No encontrado
        Quark.showAjaxNotFound(url);
      } else if(FullResponse.response.error) {
        // Error generado por el usuario
        Options.errorHandler(FullResponse.response, textStatus, jqXHR);
      } else {
        // Todo bien
        Options.dataHandler(FullResponse.response, textStatus, jqXHR);
      }
    };

    Options.error = function(jqXHR, textStatus, errorThrown)
    {
      throw 'Error en la solisitud AJAX: ' + textStatus + ' - ' + errorThrown;
    };

    $.ajax(_base_url
      + (!_friendly_url ? '?' : '')
      + url
      + (!_friendly_url ? '&' : '?')
      + 'quark_ajax=1', Options);
  };

  this.showAjaxError = function(err_msg)
  {
    alert('Ocurrio un error en la solicitud.' + (_debug ? "\n\n" + err_msg : ''));
  }

  this.showAjaxAccessDenied = function(url)
  {
    alert('No tiene permisos para "' + url + '".');
  }

  this.showAjaxNotFound = function(url)
  {
    alert('Recurso "' + url + '" no encontrado.');
  }
})();

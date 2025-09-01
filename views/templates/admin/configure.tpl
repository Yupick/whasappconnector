<form action="{$form_action}" method="post" class="defaultForm form-horizontal">
  <h3>WhatsApp Connector Avanzado</h3>

  <fieldset>
    <legend>Chat Directo</legend>

    <div class="form-group">
      <label class="control-label col-lg-3">Habilitar Chat</label>
      <div class="col-lg-9">
        <input type="checkbox" name="WC_ENABLE_CHAT" value="1" {if $enable_chat}checked{/if} />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Número (sin +, sin espacios)</label>
      <div class="col-lg-9">
        <input type="text" name="WC_PHONE_NUMBER" value="{$phone_number}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Tipo de Botón</label>
      <div class="col-lg-9">
        <label><input type="radio" name="WC_BTN_CHAT_TYPE" value="image" {if $btn_chat_type=='image'}checked{/if}/> Imagen</label>
        <label style="margin-left:20px"><input type="radio" name="WC_BTN_CHAT_TYPE" value="text" {if $btn_chat_type=='text'}checked{/if}/> Texto</label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Texto del Botón</label>
      <div class="col-lg-9">
        <input type="text" name="WC_CHAT_BUTTON_TEXT" value="{$chat_button_text}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Color Fondo</label>
      <div class="col-lg-9">
        <input type="color" name="WC_CHAT_BG_COLOR" value="{$chat_bg_color}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Color Hover</label>
      <div class="col-lg-9">
        <input type="color" name="WC_CHAT_HOVER_COLOR" value="{$chat_hover_color}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Color Texto</label>
      <div class="col-lg-9">
        <input type="color" name="WC_CHAT_TEXT_COLOR" value="{$chat_text_color}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Posición</label>
      <div class="col-lg-9">
        <select name="WC_CHAT_POSITION">
          <option value="left"  {if $chat_position=='left'}selected{/if}>Izquierda</option>
          <option value="right" {if $chat_position=='right'}selected{/if}>Derecha</option>
        </select>
      </div>
    </div>
  </fieldset>

  <fieldset style="margin-top:30px">
    <legend>Botón de Canal</legend>

    <div class="form-group">
      <label class="control-label col-lg-3">Habilitar Canal</label>
      <div class="col-lg-9">
        <input type="checkbox" name="WC_ENABLE_CHANNEL" value="1" {if $enable_channel}checked{/if} />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">ID del Canal</label>
      <div class="col-lg-9">
        <input type="text" name="WC_CHANNEL_ID" value="{$channel_id}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Tipo de Botón</label>
      <div class="col-lg-9">
        <label><input type="radio" name="WC_BTN_CHANNEL_TYPE" value="image" {if $btn_channel_type=='image'}checked{/if}/> Imagen</label>
        <label style="margin-left:20px"><input type="radio" name="WC_BTN_CHANNEL_TYPE" value="text" {if $btn_channel_type=='text'}checked{/if}/> Texto</label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Texto del Botón</label>
      <div class="col-lg-9">
        <input type="text" name="WC_CHANNEL_BUTTON_TEXT" value="{$channel_button_text}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Color Fondo</label>
      <div class="col-lg-9">
        <input type="color" name="WC_CHANNEL_BG_COLOR" value="{$channel_bg_color}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Color Hover</label>
      <div class="col-lg-9">
        <input type="color" name="WC_CHANNEL_HOVER_COLOR" value="{$channel_hover_color}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Color Texto</label>
      <div class="col-lg-9">
        <input type="color" name="WC_CHANNEL_TEXT_COLOR" value="{$channel_text_color}" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-3">Posición</label>
      <div class="col-lg-9">
        <select name="WC_CHANNEL_POSITION">
          <option value="left"  {if $channel_position=='left'}selected{/if}>Izquierda</option>
          <option value="right" {if $channel_position=='right'}selected{/if}>Derecha</option>
        </select>
      </div>
    </div>
  </fieldset>

  <div class="panel-footer">
    <button type="submit" name="submitWhatsappConnector" class="btn btn-default pull-right">
      Guardar configuración
    </button>
  </div>
</form>

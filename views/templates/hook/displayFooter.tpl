{* Estilos dinámicos para hover y formas *}
<style>
  {if $chatEnabled}
    {if $btnChatType == 'text'}
      .wc-chat-btn-text {
        background-color: {$chatBgColor};
        color: {$chatTextColor};
        border-radius: 999px;
        padding: 10px 20px;
        text-decoration: none;
        position: fixed;
        bottom: 20px;
        {$chatPos}: 20px;
        z-index: 9999;
      }
      .wc-chat-btn-text:hover {
        background-color: {$chatHoverColor};
      }
    {else}
      .wc-chat-btn-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: {$chatBgColor};
        position: fixed;
        bottom: 20px;
        {$chatPos}: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .wc-chat-btn-image:hover {
        background-color: {$chatHoverColor};
      }
      .wc-chat-btn-image img {
        width: 80%;
        height: 80%;
      }
    {/if}
  {/if}

  {if $channelEnabled}
    {if $btnChannelType == 'text'}
      .wc-channel-btn-text {
        background-color: {$chanBgColor};
        color: {$chanTextColor};
        border-radius: 999px;
        padding: 10px 20px;
        text-decoration: none;
        position: fixed;
        bottom: 20px;
        {$chanPos}: 20px;
        z-index: 9999;
      }
      .wc-channel-btn-text:hover {
        background-color: {$chanHoverColor};
      }
    {else}
      .wc-channel-btn-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: {$chanBgColor};
        position: fixed;
        bottom: 20px;
        {$chanPos}: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .wc-channel-btn-image:hover {
        background-color: {$chanHoverColor};
      }
      .wc-channel-btn-image img {
        width: 80%;
        height: 80%;
      }
    {/if}
  {/if}
</style>

{* Chat Directo *}
{if $chatEnabled}
  {if $btnChatType == 'text'}
    <a href="https://wa.me/{$phone}" class="wc-chat-btn-text" target="_blank">
      {$chatButtonText}
    </a>
  {else}
    <a href="https://wa.me/{$phone}" class="wc-chat-btn-image" target="_blank">
      <img src="{$module_dir}views/img/wpChat.png" alt="Chat WhatsApp" />
    </a>
  {/if}
{/if}

{* Botón Canal *}
{if $channelEnabled}
  {if $btnChannelType == 'text'}
    <a href="https://chat.whatsapp.com/{$channelId}" class="wc-channel-btn-text" target="_blank">
      {$channelButtonText}
    </a>
  {else}
    <a href="https://chat.whatsapp.com/{$channelId}" class="wc-channel-btn-image" target="_blank">
      <img src="{$module_dir}views/img/wpChannel.png" alt="Canal WhatsApp" />
    </a>
  {/if}
{/if}


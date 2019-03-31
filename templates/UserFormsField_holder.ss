<div id="$Name" class="field text<% if $extraClass %> $extraClass<% end_if %>">
	<% if $Title %><label class="left" for="$ID">$Title<% if $Message %><span id="{$ID}-error" class="message $MessageType form-error"><span class="sr-only">Error: </span>$Message</span><% end_if %></label><% end_if %>
	
	<div class="middleColumn">
		$Field
	</div>
	<% if $RightTitle %><span id="{$Name}_right_title" class="right-title">$RightTitle</span><% end_if %>
</div>

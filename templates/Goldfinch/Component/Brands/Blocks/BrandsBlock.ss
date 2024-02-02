<% if Items.Count %>
  <% if Items %>

    <ul>
      <% loop Items %>
        <% if not Disabled %>
          <li data-id="{$URLSegment}"><a href="#{$URLSegment}">$Name</a></li>
        <% end_if %>
      <% end_loop %>
    </ul>
    <% include Goldfinch/Nest/Partials/Pagination %>
  <% else %>
    <p>Sorry, there are no brands that match your request</p>
  <% end_if %>

<% end_if %>

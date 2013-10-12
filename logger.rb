#!/usr/bin/env ruby

require 'socket'                # Get sockets from stdlib

server = TCPServer.open(8093)   # Socket to listen on port 2000
puts 'Listening to localhost:8093'

loop {                          # Servers run forever
  Thread.start(server.accept) do |client|
    puts client.read()
    client.close                # Disconnect from the client
  end
}

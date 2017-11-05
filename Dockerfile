FROM nickistre/ubuntu-lamp:latest
COPY ./blind_injection /var/www/html/blind_injection
COPY ./visible_injection /var/www/html/visible_injection

ADD init_db.sh /tmp/init_db.sh
RUN chmod +x /tmp/init_db.sh
ADD init.sql /tmp/init.sql
RUN /tmp/init_db.sh

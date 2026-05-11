resource "aws_cloudwatch_metric_alarm" "cpu_high" {
  alarm_name          = "ec2-high-cpu"
  comparison_operator = "GreaterThanThreshold"
  evaluation_periods  = 2
  metric_name         = "CPUUtilization"
  namespace           = "AWS/EC2"
  period              = 120
  statistic           = "Average"
  threshold           = 70

  dimensions = {
    InstanceId = var.instance_id
  }

  alarm_description = "This alarm triggers when CPU exceeds 70%"

  treat_missing_data = "notBreaching"
}

resource "aws_cloudwatch_metric_alarm" "status_check_failed" {
  alarm_name          = "ec2-status-check-failed"
  comparison_operator = "GreaterThanThreshold"
  evaluation_periods  = 2
  metric_name         = "StatusCheckFailed"
  namespace           = "AWS/EC2"
  period              = 60
  statistic           = "Maximum"
  threshold           = 0

  dimensions = {
    InstanceId = var.instance_id
  }

  alarm_description = "Triggers when EC2 instance is unhealthy"
}
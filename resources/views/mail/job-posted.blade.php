<h1>
    "Hi {{ $job->employer->name }} your job {{ $job->title }} was posted successfully!"
</h1>

<p>
    It is now live on the site.
</p>

<a href={{ url("/jobs/" . $job->job_id ) }}>View your job</a>

